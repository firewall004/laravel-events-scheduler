# Project Name - **Event Schedulers**

An application to create event and view the upcoming schedules for that event.
If user create an event, the application will create recurring scheduled events for next set of days(default 90). This can be changes in `.env` file.

***Use Case :*** 

On 4th Jan 2021 (monday), if a user is creating an event with following properties  

- Name - Weekly Meeting
- Description - Sync-up with engineering team.
- Start time - 17:00
- End time - 18:00
- Day of the Week - Friday

Based on the above params, the dates of Fridays for next 90 days (till 4th Apr 2021) will be 8th 15th 22nd 29th of Jan, 5th 12th 19th 26th Feb, 5th 12th 19th 26th Mar and 2nd Apr. 

Thus, on successful submission of form write a code that also create schedules on the above mentioned dates at the event's start and end time.

---

## Additional libraries used

- [vue-fullcalendar](https://openbase.com/js/vue-fullcalendar)

This is used to get the calendar view with the events.

- [phan](https://packagist.org/packages/phan/phan)

This is a static analyzer for PHP.

- [php_codesniffer](https://packagist.org/packages/squizlabs/php_codesniffer)

PHP_CodeSniffer tokenizes PHP, JavaScript and CSS files and detects violations of a defined set of coding standards.

---

## Setup

1. clone the repo - `git clone git@github.com:firewall004/laravel-events-scheduler.git`
2. migrate the database migration - `php artisan migrate`
3. Build and compile vue / js / css - `npm run development`
4. Serve the project - `php artisan serve`

That's all :smiley:

---

## Screenshots
All Events grid
![image](https://user-images.githubusercontent.com/37473661/121789750-2babba00-cbf6-11eb-8bf4-4a8acb2e553c.png)

All Events Calendar
![image](https://user-images.githubusercontent.com/37473661/121789763-40884d80-cbf6-11eb-81bc-b258c5386e12.png)

Add Event
![image](https://user-images.githubusercontent.com/37473661/121789769-50079680-cbf6-11eb-9f57-d78a400ad8f5.png)

---
