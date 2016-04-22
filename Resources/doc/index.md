# StatsDBundle

## About ##

This bundle uses [Symfony event system](http://symfony.com/doc/current/components/console/events.html) to send statistics to a graphite using StatsD library.

## Installation ##

Add the `octante/statsd-bundle` package to your `require` section in the `composer.json` file.

``` bash
$ composer require octante/statsd-bundle
```

Add the StatsDBundle to your application's kernel:

``` php
<?php
public function registerBundles()
{
    $bundles = array(
        // ...
        new Octante\StatsDBundle\StatsDBundle(),
        // ...
    );
    ...
}
```

## Usage ##

Configure the `statsd` client(s) in your `config.yml`, this bundle uses liuggio StatsD bundle, so configuration is the same:

``` yaml
liuggio_stats_d_client:
  connection:
    host: localhost
    port: 8125
```

You can now send a counter to StatsD server. For example:

``` php
<?php
        // Create a counter event using a factory service
        $counterEvent = $this->getContainer()->get('counter.event');
        
        // Increment this counter
        $counterEvent->increment('module_name.module_action');
        
        // Send this event using Symfony events system.
        $this
            ->getContainer()
            ->get('datastats.eventdispatcher')
            ->dispatchEvent($counterEvent);
};
```

## Event types ##

This bundle includes all graphite data types:

* Counter event
* Gauge event
* Set event
* Timer event