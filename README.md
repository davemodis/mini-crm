# Тестовое задание miniCRM Yii2

https://docs.google.com/document/d/1TPd27pm-6qxLIXoW3JRwciIw53HzFrE7TOJ9gJp4kLA/edit

### Запуск приложения

Запускаем Docker
```bash
docker compose up -d
```

Входим в контейнер
```bash
docker compose exec -it backend sh
```

Запускаем инициализацию и применение миграций
```bash
./init --env=Development --overwrite=All --delete=All && \
./yii migrate
```

### Открыть сайт

#### backend 
доступен по ссылке http://127.0.0.1:21080/

Email и пароль для входа
```
admin@example.com
admin_password
```

#### frontend 
доступн по ссылке http://127.0.0.1:20080/