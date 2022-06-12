@extends('layouts.layout')
@section('content')
<!-- Main Content -->
<div id="content" class="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 id="clickAjax" class="h3 mb-0 text-gray-800">Система управления задачами</h1>
        </div>
        <!-- Content Row -->
        <div class="row">
            <div class="card shadow mb-4" style="width: 100%;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Описание проекта</h6>
                </div>
                <div class="card-body">
                    <p>Каждая задача должна иметь следующие характеристики:</p>
                    <ul>
                        <li>Название</li>
                        <li>Приоритет (низкий, средний, высокий)<br>
                            добавить: php artisan db:seed --class=PrioritySeeder
                        </li>
                        <li>Один или несколько тегов</li>
                        <li>Статус (в работе, завершена)<br>
                            добавить: php artisan db:seed --class=StatusSeeder
                        </li>
                    </ul>
                    <p>Пользователь может:</p>
                    <ul>
                        <li>Добавлять задачи</li>
                        <li>Менять приоритет</li>
                        <li>Менять статус</li>
                        <li>Добавлять удалять теги для существующей задачи</li>
                    </ul>
                    <p>Клиентская часть:</p>
                    <ul>
                        <li>Интерфейс должен быть реализован полностью на стороне клиента(браузера)</li>
                        <li>Для каждой задачи отображать статус и теги</li>
                        <li>Завершенные задачи перемещать вниз списка</li>
                        <li>Задачи сортировать по важности приоритета</li>
                        <li>Обращение к серверу с применением технологии AJAX</li>
                        <li>Использовать для верстки Фреймворк Bootstrap</li>
                    </ul>
                    <p>Серверная часть:</p>
                    <ul>
                        <li>Фильтрация входных данных</li>
                        <li>Реализовать "объекты значения": название, идентификатор задачи, приоритет,статус</li>
                        <li>Реализовать "объект сущность" задача</li>
                        <li>Для идентификаторов сущностей использовать UUID4</li>
                        <li>Для доступа к данным реализовать класс репозитория</li>
                        <li>На уровне объектной модели дать возможность реализовать отдельную реализацию репозитория</li>
                        <li>В качестве хранилища использовать на ваш выбор SQLite, MySql (MariaDB), или файлы.</li>
                    </ul>
                    <p>Код:</p>
                    <ul>
                        <li>Использовать рекомендации PSR-1, PSR-2</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Content Row -->
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection