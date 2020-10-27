FROM php:7.4-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    nano \
    g++ \
    sudo \
    iputils-ping \
    libcurl3-dev \
    libzip-dev \
    libjpeg-dev \
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
    zip \
    unzip

#RUN curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.34.0/install.sh | bash
#ENV NVM_DIR=/root/.nvm
#RUN . "$NVM_DIR/nvm.sh" && nvm install ${NODE_VERSION}
#RUN . "$NVM_DIR/nvm.sh" && nvm use v${NODE_VERSION}
#RUN . "$NVM_DIR/nvm.sh" && nvm alias default v${NODE_VERSION}
#ENV PATH="/root/.nvm/versions/node/v${NODE_VERSION}/bin/:${PATH}"

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

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN pecl install redis
RUN docker-php-ext-enable redis
# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user
RUN chown -R $user:www-data /var/www
RUN apt-get install libssl-dev
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Set working directory

WORKDIR /var/www
USER $user
ENV NVM_DIR /home/$user/.nvm
ENV NODE_VERSION 12.18.3
# install nvm
# https://github.com/creationix/nvm#install-script
RUN curl --silent -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.8/install.sh | bash
RUN export NVM_DIR="/home/$user/.nvm"
# install node and npm
#RUN source $NVM_DIR/nvm.sh \
#    && nvm install $NODE_VERSION \
#    && nvm alias default $NODE_VERSION \
#    && nvm use default

# add node and npm to path so the commands are available
ENV NODE_PATH $NVM_DIR/versions/node/v$NODE_VERSION
ENV PATH $NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH
RUN export PATH=$NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH
#RUN source $NVM_DIR/nvm.sh
#SHELL ["/bin/bash", "--login", "-c"]
#
#RUN curl -sL https://raw.githubusercontent.com/creationix/nvm/v0.33.8/install.sh | bash
#RUN nvm install 12 && nvm use 12
# Clear cache
RUN npm install -g yarn
USER root
ENV WORKING_DIR /var/www
RUN  chown -R $user:www-data ${WORKING_DIR}
#CMD find $WORKING_DIR -type d -exec chmod 755 {} \;
#CMD find $WORKING_DIR -type f -exec chmod 664 {} \;
USER $user
CMD ["./entry.sh"]
