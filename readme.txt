db u321995121_unners
user u321995121_root
pass Siapunnes123

RewriteCond %{HTTPS} off
RewriteRule ^.*$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]