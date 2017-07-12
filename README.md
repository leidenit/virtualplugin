# VM Students control
Система позволяет переходить из moodle на странички виртуальных сред и работать с виртуальными машинами, специально привязанными к виртуальным практикумам.

## Установка
1) Скопировать файлы в директорию moodle
2) Создать файл .htdocs с настройками перенаправления в папку системы
3) Настроить файл settings.php
4) Прописать  параметры домена и базы данных в settings.php
5) Установить VirtualBox от того-же юзера, что и Apache (или другой сервер)

## Состав проекта

Карта дирректорий модуля

```
virtualplugin/
├── assets/
|   ├── css/
|   ├── js/
|   ├── fonts/
|   └── img/
|
├── actions/
|   ├── get_das.php
|   ├── close_vm.php
|   └── get_vm.php
|
├── base/
|   ├── footer.php
|   └── header.php
|
├── libs/
|   ├── db/
|   |   └─dbconnection.php
|   |
|   └── interface_lib/
|       └─interface_lib.php
|
├── modules/
|   ├── lesson/
|   |   ├─actions/
|   |   | ├─add_action.php
|   |   | ├─delete_action.php
|   |   | ├─update_action.php
|   |   | └─backup/
|   |   |
|   |   ├─lib/
|   |   | └─functions.php
|   |   |
|   |   ├─tamplates/
|   |   | └─create_form.php
|   |   |
|   |   ├── change.php
|   |   ├── index.php
|   |   └── init.php
|   |
|   ├── users/  --//--
|   ├── virtualboxscript/  --//--
|   └── vm/  --//--
|
├── images/
|
|
|

├── index.php
├── router.php
├── set.php
└── settings.php


```

### Версии

V0.01 - 1.11.2016 Прототип.
v0.9 - 4.11.2016 Рабочая вресия(Добавлены комментарии/RDP/Удалён мусор)
v0.9901 - 5.11.2015 Исправлен дизайн
v1.2 - 11.07.2015 Добавлена система резервного копирования и прлностью переработана внутренняя логика
