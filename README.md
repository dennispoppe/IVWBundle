# IVWBundle
IVW Bundle for Symfony


Set the basic configuration in `app/config/config.yml`.

Example:
```yaml
ivw:
    stattags:
        suche:
            path: "content/search"
            tags:
                ivw: "suchmaschinen_allg"
                nedstat: "suche"
        ErweiterteSuche:
            path: "content/advancedsearch"
            tags:
                ivw: "suche_suchmaschinen_erw"
                nedstat: "suche.erweitert"
        frontPage:
            path: "content/frontPage"
            tags:
                ivw: "frontPage_allg"
                nedstat: "frontPage"
```
