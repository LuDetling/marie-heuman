# marie-heuman

# Local

ctrl + h sur le .sql pour modifier le nom de la base de données
wp search-replace "https://marieheuman.com" "http://localhost/marie-heuman" --all-tables

# Prod

wp search-replace  "http://localhost/marie-heuman" "https://marieheuman.com" --all-tables
