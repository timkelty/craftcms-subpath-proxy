# Craft CMS Subpath Proxy

## Install

```shell
cp .env.example .env
docker-compose up -d

# Set `@web` for site URL
docker-compose exec craft php craft install
```

## URLS

- Craft template frontend: http://viiv.localhost/backend
- Craft CP: http://viiv.localhost/backend/admin

## Notes

There are a few important Craft settings needed to facilitate this configuration:

- `baseCpUrl` must be set to the same value as `@web`.
  - This is a bug, but will not be fixed until Craft 4 because it may break compatibility for others: https://github.com/craftcms/cms/pull/10048
- `pathParam` must be set to `null`.
  - By default, Craft's action controller URLS use `/index.php?p=` for maximum compatibility.
  - In this case, it breaks things because we would actually need it use `/backend/index.php?p=`.
  - Setting `pathParam` to `null` forces Craft to use the full path for routing, even for these action URLs.
- For CP resources to work properly, (this bug fix)[https://github.com/craftcms/cms/commit/bd8e270fda3f8ac8d27ff0d78aa39e5947a1260c] is needed. It is currently unreleased, hence the `dev-develop` in `composer.json`.