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

and add `ContainerDocProvider` to your Application Container.

```
$app->register(new iakio\containerdoc\ContainerDocProvider());
```

Then, just access `/containerdoc`.

![containerdoc](http://img.f.hatena.ne.jp/images/fotolife/i/iakio/20140704/20140704120937.png)
