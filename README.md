
# nitesh_custom_api
1. Custom module to add additional field site API key in site information form

2. run git clone https://github.com/nitesh624/nitesh_custom_api.git into your module directory

3. enable the module "Nitesh Custom API" from extend page or using drush pm-enable

4. To set api key go to site information form and enter the key in site API key field and click on Update Configuration

5. This module also give JSON response when the API you have entered is passed as url parameter in /page_json/{apikey}/{nid} 
where apikey is the API key you have saved in site information form and nid is the node id

References: 
1. https://api.drupal.org/api/drupal/core%21lib%21Drupal%21Core%21Form%21form.api.php/function/hook_form_alter/8.7.x
2. https://drupal.stackexchange.com/questions/191419/drupal-8-node-serialization-to-json
