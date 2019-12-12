FROM gitpod/workspace-postgres

USER root

RUN apt-get update \
   && apt-get install -y php-bcmath php-mbstring php-xml \
   && apt-get clean && rm -rf /var/cache/apt/* && rm -rf /var/lib/apt/lists/* && rm -rf /tmp/*

RUN composer global require laravel/installer
