require('dotenv').config();

const env = process.env;
require('laravel-echo-server').run({
    authHost: `http://${env.DOCKER_IMAGE_NAME}-server`,
    devMode: env.APP_DEBUG,
    database: 'redis',
    protocol: "http",
    subscribers: {http: true, redis: true},
    databaseConfig: {
        redis: {
            "host": env.REDIS_HOST,
            "port": env.REDIS_PORT,
            "password": env.REDIS_PASSWORD,
            "options": {
                "db": `${env.REDIS_DB || 0}`
            }
        }
    },
    host: null,
    port: 6001,
    apiOriginAllow: {
        allowCors: true,
        allowOrigin: '*',
        allowMethods: 'GET, POST',
        allowHeaders: 'Origin, Content-Type, X-Auth-Token, X-Requested-With, Accept, Authorization, X-CSRF-TOKEN, X-Socket-Id'
    }
});
