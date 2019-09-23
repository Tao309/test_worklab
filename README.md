# Тестовое задание на вакансию php разработчика в компанию WorkLab
Необходимо спроектировать простейшее REST API для каталога товаров.

###### Приложение должно содержать:
 - Категории товаров, вложенность не требуется
 - Конкретные товары, которые принадлежат к какой-то категории (один товар может принадлежать нескольким категориям)
 - Пользователей и их профиль, которые могут авторизоваться

###### Возможные действия:
- Получение списка всех категорий
- Получение списка товаров в конкретной категории
- Получение товара по id
- Авторизация пользователей
- Редактирования профиля пользователя
- Добавление/Редактирование/Удаление категории (для авторизованных пользователей)
- Добавление/Редактирование/Удаление товара (для авторизованных пользователей)

###### Требования / Ограничения / Технологии
При проектировании учесть стек технологий
- PHP;
- Framework – Laravel;
- PostgreSQL
- Документация в формате https://swagger.io/; 

###### Результат
- Диаграмма БД, описательная часть по полям.
- Роутеры в формате Laravel. https://laravel.com/docs/5.8/routing
- Одна модель Eloquent, на Ваш выбор. https://laravel.com/docs/5.8/eloquent
- Документация в swagger.oi одного контроллера, на Ваш выбор.
- Код должен проходить тесты PSR-2