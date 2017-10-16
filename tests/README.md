Testing information
===================

This readme contains a bit of information regarding writing tests for Nova Poshta PHP library and executing them.

Writing Tests
-------------

* Test classes should be in the same namespace as the class that is being tested
* Tests should be marked with the groups **Slow** and **VerySlow** if they require more than
  10 seconds and 1 minute respectively. If a test is marked as VerySlow it should also be marked
  as Slow.
* Both functional and unit tests are welcome.

Executing Tests
---------------

Currently only one testsuite is defined (all tests).

PHPUnit should be run from inside the root folder or the phpunit.xml file should be provided
as config.
