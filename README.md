# PhpCurrencyApi
Api that returns value of rubl comapred to other currencies

http://localhost/login
with basic auth
username: admin
password: adminpass
Will return token that can be user to get currency values.

http://localhost/currencies

with bearer token is going to return all curreny values in db

http://localhost/currency/1
with bearer token will return currency with id 1

http://localhost/update
to update all currencies from http://www.cbr.ru/scripts/XML_daily.asp
