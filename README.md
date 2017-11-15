# OsmosUserBundle

Well, at first! We need to type inside our composer.json the lines below

``` javascript
"require": {
    "osmos/osmos-user-bundle": "dev-master"
},
"repositories": [{
    "type": "vcs",
    "url": "https://github.com/bribieska/OsmosUserBundle.git"
}]
```

After that and hoping that all will be ok, we execute the follow command

```
composer update osmos/osmos-user-bundle
```

We need to type on config.yml file the lines below

```
osmos_user:
    projects:
        api: "url/where/is/located/this/project"
        outsource: "url/where/is/located/this/project"
        paysheet: "url/where/is/located/this/project"
```

Finally, don't forget to put the instance from bundle on appKernel.php

``` php
new \OsmosUserBundle\OsmosUserBundle()
```

And that's all. It was very easy, isn't it? Then now use it motherfucker.