highschool
==========

The demo project on technologies PostgreSQL / Symfony2 / JavaScript

Simulation system of higher education.

Database consists of 15 tables (university, faculty, department, specialty, department, specialty, curriculum, subject, teacher, student, studentgroup, shedule, marks, classroom, city, region).

DB is filled with test data: 200 universities in Ukraine, 2000 faculties, 8000 departments, 160K teachers, 2.7 million students, 70 million sessions, 250 million marks. The project has more than 30 PL/pgSQL functions for filling of database, 5 materialized views.

The server part is written using Symfony2.

It is possible to view / add / modify / delete data. Used DOCTRINE 2 ORM. To work with large volumes - direct requests to the database through DBAL, native SQL. Pagination and sorting. Customized data entry forms (including due to the large size of the database using Data Transformers).

Front-end: used template TWIG + code.highcharts.com interactive maps and charts.

===========

Демо-проект на технологиях PostgreSQL / Symfony2 / JavaScript

Моделирование системы высшей школы.

В БД 15 таблиц (университет, факультет, кафедра, специальность, кафедра-специальность, учебный план, предмет, преподаватель, студент, студ.группа, занятие, оценки, аудитория, город, регион) + вспомогательные.
БД наполнена тестовыми данными: 200 ВУЗов Украины, 2000 факультетов, 8000 кафедр, 160к преподавателей, 2.7 млн студентов, 70 млн занятий, 250 млн оценок/пропусков.
В проекте более 30 PL/pgSQL функций для заполения БД, 5 materialized views

Серверная часть написана с использованием Symfony2.

Есть возможность просмотреть/добавить/изменить/удалить данные.
Используется DOCTRINE 2 ORM. 
Для работы с большими объемами - прямые запросы к базе через DBAL, нативный SQL.
Пагинация и сортировка.
Кастомизированы формы для ввода даных (в том числе из-за больших
размеров БД используется Data Transformers).

Front-end: используется шаблонизатор TWIG + интерактивные карты code.highcharts.com и графики отображающие статистику.

Схема базы данных проекта:
![Схема базы данных](https://github.com/bruvinsky/HighSchool/raw/master/about/diagram1.png)
Статистика. Распределение студентов по областям проживания:
![Распределение студентов по областям проживания](https://github.com/bruvinsky/HighSchool/raw/master/about/diagram2.png)
Статистика. Распределение факультетов по ВУЗам:
![Распределение факультетов по ВУЗам](https://github.com/bruvinsky/HighSchool/raw/master/about/diagram3.png)
Общая информация о проекте + возможность просмотра списка студентов группы (проход по структурам университет-->факультет-->специальность-кафедра-->группа реализовани ajax запросами):
![Общая информация о проекте](https://github.com/bruvinsky/HighSchool/raw/master/about/diagram4.png)
Пример создания сущности ( в данном случае - студ.группы):
![Пример создания сущности](https://github.com/bruvinsky/HighSchool/raw/master/about/diagram5.png)
Список занятий группы с возможностью просмотра оценок:
![Список занятий группы](https://github.com/bruvinsky/HighSchool/raw/master/about/diagram6.png)
Список оценок на занятии:
![Список оценок на занятии](https://github.com/bruvinsky/HighSchool/raw/master/about/diagram7.png)
