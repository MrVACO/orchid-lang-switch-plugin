![plugin Lang switch](https://preview.dragon-code.pro/plugin/Lang%20switch.svg?brand=orchid-software&preposition=as&pretty-title=0&mode=auto)

# Смена языка

## Установка
- ```composer require mr-vaco/orchid-lang-switch-plugin```
- Указать в конфигурационном файле таблицу с юзерами
- 
- В модели юзеров добавить:
```php
protected $fillable = [
    ...
    'locale',
];
```