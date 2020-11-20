FROM php:7.4-apache

MAINTAINER Sam Maosa <maosa.sam@gmail.com>

ENV APP_ROOT /var/www/html
ENV DOCKER_PATH .docker

RUN apt-get update -qq && apt-get install -y \
  git \
  curl \
  nano \
  g++ \
  sudo \
  build-essential \
  mariadb-client \
  iputils-ping \
  libcurl3-dev \
  libzip-dev \
  libjpeg-dev \
  libpq-dev \
  libpng-dev \
  libonig-dev \
  libxml2-dev \
  libxrender1 \
  libfontconfig1 \
  libx11-dev \
  libjpeg62 \
  libxtst6 \
  libfreetype6-dev \
  libsqlite3-dev \
  libldap2-dev \
  libssl-dev \
  zip \
  unzip

# extensions php install
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/
# Install PHP extensions
RUN docker-php-ext-install pdo_mysql \
    tokenizer \
    fileinfo \
    ctype \
    mbstring \
    exif \
    intl \
    pcntl \
    bcmath \
    gd \
    json \
    curl \
    xml \
    zip \
    ldap \
    pdo_sqlite
# Node.js
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash - \
&& apt-get install -y nodejs && npm i npm@latest -g

# cross-env global
RUN npm install -g cross-env yarn

# Composer install
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN pecl install redis
RUN docker-php-ext-enable redis

WORKDIR $APP_ROOT
ARG user
ARG uid
RUN useradd -G www-data,root -u $uid -d /home/$user $user && echo "$user:$user" | chpasswd && adduser $user sudo
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user
RUN chown -R $user:www-data $APP_ROOT
COPY $DOCKER_PATH/vhost.conf /etc/apache2/sites-available/vhost.conf
COPY . .
RUN a2enmod rewrite headers
RUN a2dissite 000-default.conf
RUN a2ensite vhost.conf
# Clean up APT when done
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN service apache2 restart
##Run initial commands
ENTRYPOINT ["./entry.sh"]
CMD ["$@"]
