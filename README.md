# Тестовое задание miniCRM Yii2

https://docs.google.com/document/d/1TPd27pm-6qxLIXoW3JRwciIw53HzFrE7TOJ9gJp4kLA/edit

## Запуск приложения

### Запустить контейнеры
```bash
docker compose up -d
```

### Применить миграции

Войти в контейнер
```bash
docker compose exec -it backend sh
```

Запустить применение миграций
```bash
./yii migrate
```

### Открыть сайта

backend доступен по ссылке http://127.0.0.1:21080/
frontend доступн по сслыке http://127.0.0.1:20080/