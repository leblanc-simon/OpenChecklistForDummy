OpenChecklistForDummy
=====================

A simple application to create checklist.

Installation
------------

```bash
git clone https://github.com/leblanc-simon/OpenChecklistForDummy.git
cd OpenChecklistForDummy
composer install
sass app/template/sass/main.sass web/css/main.css
```

The DOCUMENT_ROOT of your webserver must be ```web``` directory.
 
Add a checklist
---------------

it's [KISS](https://en.wikipedia.org/wiki/KISS_principle) :

* one file by item
* first line : tags separated by comma
* second line : title of item
* rest : markdown content that explain more

Add files in the ```app/datas``` directory. Files must be Markdown (*.md)

### Example of a file

```text
high,log
Add log for critical functions
Use monolog
===========

Add the service in Symfony configuration
```

Credits
=======

* Parsedown : license MIT (http://parsedown.org/)

License
=======

Licence WTFPL : http://sam.zoy.org/wtfpl/

Author
======

Simon Leblanc <contact@leblanc-simon.eu>
