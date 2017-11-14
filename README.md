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

Finally, don't forget to put the instance from bundle on appKernel.php

``` php
new \OsmosUserBundle\OsmosUserBundle()
```

And that's all. It was very easy, isn't it? Then now use it motherfucker.