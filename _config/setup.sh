#!/bin/bash

BASEDIR=$(dirname "$(readlink -f $0)")

wp core install --prompt=admin_password < $BASEDIR/secrets/adminpass
wp config shuffle-salts
wp option update blogdescription "Libros (no solo de cine) para lectores espectaculares"
wp theme activate jimmy20

# install & activate
# wp plugin install wordpress-importer --activate
# wp plugin install classic-editor --activate
# wp plugin install jetpack --activate
# wp plugin install post-smtp --activate
# wp plugin install tinymce-advanced --activate
# wp plugin install woocommerce --activate
# wp plugin install woocommerce-gateway-stripe --activate
# wp plugin install wordpress-seo --activate

# HACK for ovh deployment: packages must be installed
wp plugin activate wordpress-importer
wp plugin activate classic-editor
wp plugin activate jetpack
wp plugin activate post-smtp
wp plugin activate tinymce-advanced
wp plugin activate woocommerce
wp plugin activate woocommerce-gateway-stripe
wp plugin activate wordpress-seo

wp term update category 1 --name="Noticias" --slug="noticias"
wp term update product_cat uncategorized --by=slug --name=Cine --slug=cine
wp term generate category --count=4 --format="ids"
wp term create product_cat Hamsterdam --slug=hamsterdam
wp term create product_cat Sincine --slug=sincine

wp user create svt sergio@macnulti.es --role=shop_manager
wp user create icano ivan@macnulti.es --role=shop_manager
wp user create jdct josedavid@macnulti.es --role=shop_manager


# Plugin s3 uploads
# wp plugin activate s3-uploads
# wp s3-uploads verify
