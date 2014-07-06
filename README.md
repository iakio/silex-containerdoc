silex-containerdoc
==================

# Usage

Add dependency to your `composer.json`.

```
{
    "require": {
        "iakio/silex-containerdoc": "*"
    }
}
```

and mount `ContainerDocProvider` to your Application Container.

```
$app->mount('/containerdoc', new iakio\containerdoc\ContainerDocProvider());
```

Then, just access `/containerdoc`.

![containerdoc](http://img.f.hatena.ne.jp/images/fotolife/i/iakio/20140704/20140704120937.png)
