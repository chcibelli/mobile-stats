#!/bin/bash
export USER='#################'
export PASSWORD='#################'
export CLIENT_KEY='########################'
export URL='https://api.appfigures.com/v2/reports/sales/?group_by=products'
curl -H"X-Client-Key: $CLIENT_KEY" -u"$USER:$PASSWORD" "${URL}&pretty=true"
