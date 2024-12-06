FROM nginx:alpine

# Copy SSL certificates
COPY ./docker/nginx/ssl /etc/nginx/ssl

# Copy custom Nginx configuration
COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# Expose ports
EXPOSE 80 443

