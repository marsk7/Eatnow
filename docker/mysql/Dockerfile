FROM mysql:8.0

# Initialize database
COPY ./backup.sql /docker-entrypoint-initdb.d/backup.sql

# Expose MySQL port
EXPOSE 3306

