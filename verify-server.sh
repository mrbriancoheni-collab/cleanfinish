#!/bin/bash

###############################################################################
# CleanFinish WordPress Server Verification Script
# This script checks that all necessary components are working
###############################################################################

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Counters
PASS=0
FAIL=0
WARN=0

echo -e "${BLUE}═══════════════════════════════════════════════════════${NC}"
echo -e "${BLUE}  CleanFinish WordPress Server Verification Script${NC}"
echo -e "${BLUE}═══════════════════════════════════════════════════════${NC}"
echo ""

# Function to print status
print_status() {
    if [ $1 -eq 0 ]; then
        echo -e "${GREEN}✓ PASS${NC} - $2"
        ((PASS++))
    elif [ $1 -eq 2 ]; then
        echo -e "${YELLOW}⚠ WARN${NC} - $2"
        ((WARN++))
    else
        echo -e "${RED}✗ FAIL${NC} - $2"
        ((FAIL++))
    fi
}

###############################################################################
# 1. PHP Checks
###############################################################################
echo -e "\n${BLUE}[1] PHP Configuration${NC}"
echo "─────────────────────────────────────────────────────"

# Check PHP version
PHP_VERSION=$(php -v 2>/dev/null | head -n1 | grep -oP 'PHP \K[0-9.]+')
if [ -n "$PHP_VERSION" ]; then
    PHP_MAJOR=$(echo $PHP_VERSION | cut -d. -f1)
    PHP_MINOR=$(echo $PHP_VERSION | cut -d. -f2)
    if [ $PHP_MAJOR -ge 8 ] || ([ $PHP_MAJOR -eq 7 ] && [ $PHP_MINOR -ge 4 ]); then
        print_status 0 "PHP version $PHP_VERSION (meets requirement >= 7.4)"
    else
        print_status 1 "PHP version $PHP_VERSION (requires >= 7.4)"
    fi
else
    print_status 1 "PHP not found or not in PATH"
fi

# Check required PHP extensions
REQUIRED_EXTENSIONS=("mysqli" "json" "curl" "gd" "mbstring" "xml" "zip")
for ext in "${REQUIRED_EXTENSIONS[@]}"; do
    if php -m 2>/dev/null | grep -qi "^$ext$"; then
        print_status 0 "PHP extension: $ext"
    else
        print_status 1 "PHP extension: $ext (MISSING)"
    fi
done

# Check PHP memory limit
MEMORY_LIMIT=$(php -r "echo ini_get('memory_limit');" 2>/dev/null)
if [ -n "$MEMORY_LIMIT" ]; then
    MEMORY_NUM=$(echo $MEMORY_LIMIT | grep -oP '\d+')
    if [ $MEMORY_NUM -ge 256 ]; then
        print_status 0 "PHP memory_limit: $MEMORY_LIMIT (recommended >= 256M)"
    else
        print_status 2 "PHP memory_limit: $MEMORY_LIMIT (low, recommend >= 256M)"
    fi
fi

# Check max upload size
UPLOAD_MAX=$(php -r "echo ini_get('upload_max_filesize');" 2>/dev/null)
print_status 0 "PHP upload_max_filesize: $UPLOAD_MAX"

POST_MAX=$(php -r "echo ini_get('post_max_size');" 2>/dev/null)
print_status 0 "PHP post_max_size: $POST_MAX"

###############################################################################
# 2. Web Server Checks
###############################################################################
echo -e "\n${BLUE}[2] Web Server${NC}"
echo "─────────────────────────────────────────────────────"

# Check if Apache is running
if systemctl is-active --quiet apache2 2>/dev/null; then
    print_status 0 "Apache2 is running"

    # Check mod_rewrite
    if apache2ctl -M 2>/dev/null | grep -q rewrite; then
        print_status 0 "Apache mod_rewrite is enabled"
    else
        print_status 1 "Apache mod_rewrite is NOT enabled"
    fi
elif systemctl is-active --quiet httpd 2>/dev/null; then
    print_status 0 "Apache (httpd) is running"
elif systemctl is-active --quiet nginx 2>/dev/null; then
    print_status 0 "Nginx is running"
else
    print_status 1 "No web server detected (Apache/Nginx)"
fi

###############################################################################
# 3. Database Checks
###############################################################################
echo -e "\n${BLUE}[3] Database${NC}"
echo "─────────────────────────────────────────────────────"

# Check MySQL/MariaDB
if command -v mysql &> /dev/null; then
    MYSQL_VERSION=$(mysql --version 2>/dev/null | grep -oP '(mysql|MariaDB) Ver \K[0-9.]+')
    if [ -n "$MYSQL_VERSION" ]; then
        print_status 0 "MySQL/MariaDB version: $MYSQL_VERSION"
    fi

    if systemctl is-active --quiet mysql 2>/dev/null || systemctl is-active --quiet mariadb 2>/dev/null; then
        print_status 0 "MySQL/MariaDB service is running"
    else
        print_status 1 "MySQL/MariaDB service is NOT running"
    fi
else
    print_status 1 "MySQL/MariaDB not found"
fi

###############################################################################
# 4. PHP-FPM Checks (if applicable)
###############################################################################
echo -e "\n${BLUE}[4] PHP-FPM (if applicable)${NC}"
echo "─────────────────────────────────────────────────────"

PHP_FPM_SERVICES=$(systemctl list-units --type=service --all 2>/dev/null | grep -oP 'php[0-9.]*-fpm' | head -1)
if [ -n "$PHP_FPM_SERVICES" ]; then
    if systemctl is-active --quiet $PHP_FPM_SERVICES 2>/dev/null; then
        print_status 0 "PHP-FPM ($PHP_FPM_SERVICES) is running"

        # Check PHP-FPM pool configuration
        POOL_CONF=$(find /etc/php* -name "www.conf" 2>/dev/null | head -1)
        if [ -f "$POOL_CONF" ]; then
            MAX_CHILDREN=$(grep "^pm.max_children" $POOL_CONF | grep -oP '\d+')
            if [ -n "$MAX_CHILDREN" ]; then
                if [ $MAX_CHILDREN -ge 20 ]; then
                    print_status 0 "PHP-FPM max_children: $MAX_CHILDREN"
                else
                    print_status 2 "PHP-FPM max_children: $MAX_CHILDREN (low, recommend >= 20)"
                fi
            fi
        fi
    else
        print_status 1 "PHP-FPM ($PHP_FPM_SERVICES) is NOT running"
    fi
else
    print_status 2 "PHP-FPM not detected (may be using mod_php)"
fi

###############################################################################
# 5. WordPress Directory Checks
###############################################################################
echo -e "\n${BLUE}[5] WordPress Installation${NC}"
echo "─────────────────────────────────────────────────────"

# Try to find WordPress installation
WP_PATHS=("/var/www/html" "/var/www/cleanfinish.net" "/home/*/public_html" "/usr/share/nginx/html")
WP_ROOT=""

for path in "${WP_PATHS[@]}"; do
    EXPANDED_PATHS=$(eval echo $path)
    for p in $EXPANDED_PATHS; do
        if [ -f "$p/wp-config.php" ]; then
            WP_ROOT="$p"
            break 2
        fi
    done
done

if [ -n "$WP_ROOT" ]; then
    print_status 0 "WordPress found at: $WP_ROOT"

    # Check wp-config.php
    if [ -f "$WP_ROOT/wp-config.php" ]; then
        print_status 0 "wp-config.php exists"

        # Check if it's readable
        if [ -r "$WP_ROOT/wp-config.php" ]; then
            print_status 0 "wp-config.php is readable"
        else
            print_status 2 "wp-config.php is not readable by current user"
        fi
    else
        print_status 1 "wp-config.php NOT found"
    fi

    # Check important directories
    if [ -d "$WP_ROOT/wp-content" ]; then
        print_status 0 "wp-content directory exists"

        # Check if writable
        if [ -w "$WP_ROOT/wp-content" ]; then
            print_status 0 "wp-content is writable"
        else
            print_status 1 "wp-content is NOT writable"
        fi
    fi

    if [ -d "$WP_ROOT/wp-content/themes/cleanfinish-pro" ]; then
        print_status 0 "CleanFinish Pro theme found"

        # Check theme files
        THEME_FILES=("style.css" "functions.php" "header.php" "footer.php" "index.php")
        for file in "${THEME_FILES[@]}"; do
            if [ -f "$WP_ROOT/wp-content/themes/cleanfinish-pro/$file" ]; then
                print_status 0 "Theme file: $file"
            else
                print_status 1 "Theme file MISSING: $file"
            fi
        done
    else
        print_status 1 "CleanFinish Pro theme NOT found"
    fi

    if [ -d "$WP_ROOT/wp-content/uploads" ]; then
        print_status 0 "uploads directory exists"
        if [ -w "$WP_ROOT/wp-content/uploads" ]; then
            print_status 0 "uploads directory is writable"
        else
            print_status 1 "uploads directory is NOT writable"
        fi
    else
        print_status 2 "uploads directory does not exist (will be created on first upload)"
    fi
else
    print_status 1 "WordPress installation NOT found in common locations"
    echo -e "${YELLOW}    Searched: ${WP_PATHS[@]}${NC}"
fi

###############################################################################
# 6. Cron Checks
###############################################################################
echo -e "\n${BLUE}[6] Cron Jobs${NC}"
echo "─────────────────────────────────────────────────────"

if command -v crontab &> /dev/null; then
    if crontab -l 2>/dev/null | grep -q "wp-cron"; then
        print_status 0 "WordPress cron job found in crontab"
    else
        print_status 2 "WordPress cron job NOT in crontab (using default WP pseudo-cron)"
    fi

    if systemctl is-active --quiet cron 2>/dev/null || systemctl is-active --quiet crond 2>/dev/null; then
        print_status 0 "Cron service is running"
    else
        print_status 1 "Cron service is NOT running"
    fi
else
    print_status 2 "Crontab command not available"
fi

###############################################################################
# 7. SSL/HTTPS Checks
###############################################################################
echo -e "\n${BLUE}[7] SSL/HTTPS${NC}"
echo "─────────────────────────────────────────────────────"

if command -v certbot &> /dev/null; then
    print_status 0 "Certbot (Let's Encrypt) is installed"

    # Check for certificates
    if ls /etc/letsencrypt/live/ 2>/dev/null | grep -q cleanfinish; then
        print_status 0 "SSL certificate found for cleanfinish"
    else
        print_status 2 "SSL certificate NOT found (may not be using Let's Encrypt)"
    fi
else
    print_status 2 "Certbot not installed (may be using different SSL method)"
fi

###############################################################################
# 8. System Resources
###############################################################################
echo -e "\n${BLUE}[8] System Resources${NC}"
echo "─────────────────────────────────────────────────────"

# Check disk space
DISK_USAGE=$(df -h / | awk 'NR==2 {print $5}' | sed 's/%//')
if [ $DISK_USAGE -lt 80 ]; then
    print_status 0 "Disk usage: ${DISK_USAGE}% (healthy)"
elif [ $DISK_USAGE -lt 90 ]; then
    print_status 2 "Disk usage: ${DISK_USAGE}% (getting high)"
else
    print_status 1 "Disk usage: ${DISK_USAGE}% (CRITICAL - need cleanup)"
fi

# Check memory
TOTAL_MEM=$(free -m | awk 'NR==2 {print $2}')
USED_MEM=$(free -m | awk 'NR==2 {print $3}')
MEM_PERCENT=$((USED_MEM * 100 / TOTAL_MEM))

if [ $MEM_PERCENT -lt 80 ]; then
    print_status 0 "Memory usage: ${MEM_PERCENT}% (${USED_MEM}MB / ${TOTAL_MEM}MB)"
elif [ $MEM_PERCENT -lt 90 ]; then
    print_status 2 "Memory usage: ${MEM_PERCENT}% (${USED_MEM}MB / ${TOTAL_MEM}MB) - getting high"
else
    print_status 1 "Memory usage: ${MEM_PERCENT}% (${USED_MEM}MB / ${TOTAL_MEM}MB) - CRITICAL"
fi

# Check load average
LOAD_AVG=$(uptime | grep -oP 'load average: \K[0-9.]+')
print_status 0 "Load average: $LOAD_AVG"

###############################################################################
# 9. Network/Connectivity
###############################################################################
echo -e "\n${BLUE}[9] Network Connectivity${NC}"
echo "─────────────────────────────────────────────────────"

# Check if site is accessible
if command -v curl &> /dev/null; then
    HTTP_CODE=$(curl -s -o /dev/null -w "%{http_code}" http://cleanfinish.net/ 2>/dev/null)
    if [ "$HTTP_CODE" = "200" ] || [ "$HTTP_CODE" = "301" ] || [ "$HTTP_CODE" = "302" ]; then
        print_status 0 "Site is accessible (HTTP $HTTP_CODE)"
    else
        print_status 1 "Site returned HTTP $HTTP_CODE"
    fi
else
    print_status 2 "curl not available to test site"
fi

# Check DNS
if command -v dig &> /dev/null; then
    if dig +short cleanfinish.net | grep -q "[0-9]"; then
        print_status 0 "DNS resolution working for cleanfinish.net"
    else
        print_status 1 "DNS resolution failed for cleanfinish.net"
    fi
elif command -v nslookup &> /dev/null; then
    if nslookup cleanfinish.net 2>/dev/null | grep -q "Address"; then
        print_status 0 "DNS resolution working for cleanfinish.net"
    else
        print_status 1 "DNS resolution failed for cleanfinish.net"
    fi
else
    print_status 2 "No DNS tools available (dig/nslookup)"
fi

###############################################################################
# Summary
###############################################################################
echo -e "\n${BLUE}═══════════════════════════════════════════════════════${NC}"
echo -e "${BLUE}  Summary${NC}"
echo -e "${BLUE}═══════════════════════════════════════════════════════${NC}"
echo -e "${GREEN}Passed:  $PASS${NC}"
echo -e "${YELLOW}Warnings: $WARN${NC}"
echo -e "${RED}Failed:  $FAIL${NC}"
echo ""

if [ $FAIL -eq 0 ]; then
    echo -e "${GREEN}✓ All critical checks passed!${NC}"
    echo -e "${GREEN}  Your WordPress server appears to be properly configured.${NC}"
    exit 0
elif [ $FAIL -lt 5 ]; then
    echo -e "${YELLOW}⚠ Some issues found, but server may still function.${NC}"
    echo -e "${YELLOW}  Review the failures above and fix as needed.${NC}"
    exit 1
else
    echo -e "${RED}✗ Multiple critical issues found!${NC}"
    echo -e "${RED}  Please review and fix the failures above.${NC}"
    exit 2
fi
