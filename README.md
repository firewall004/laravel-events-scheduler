# Project Name

Event Schedulers

An application to create event and view the upcoming schedules for that event.
If user create an event, the application will create recurring scheduled events for next set of days(default 90). This can be changes in `.env` file.

***For Example :*** 

On 4th Jan 2021 (monday), if a user is creating an event with following properties  

- Name - Weekly Meeting
- Description - Sync-up with engineering team.
- Start time - 17:00
- End time - 18:00
- Day of the Week - Friday

Based on the above params, the dates of Fridays for next 90 days (till 4th Apr 2021) will be 8th 15th 22nd 29th of Jan, 5th 12th 19th 26th Feb, 5th 12th 19th 26th Mar and 2nd Apr. 

Thus, on successful submission of form write a code that also create schedules on the above mentioned dates at the event's start and end time.

## Additional library used

###Calendar
[vue-fullcalendar](https://openbase.com/js/vue-fullcalendar)

This is used to get the calendar view with the events.

###Phan
[phan](https://packagist.org/packages/phan/phan)

This is a static analyzer for PHP.

###PHPCS
[php_codesniffer](https://packagist.org/packages/squizlabs/php_codesniffer)
PHP_CodeSniffer tokenizes PHP, JavaScript and CSS files and detects violations of a defined set of coding standards.

---

## Setup

## Steps

1. clone the repo - `git clone git@github.com:firewall004/laravel-events-scheduler.git`
2. migrate the database migration - `php artisan migrate`
3. Build and compile vue / js / css - `npm run development`

That's all :)

## TODOs

1. Add images
2. Add logs
3. Add pagination
