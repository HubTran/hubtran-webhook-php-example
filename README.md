# Example HubTran Webhook Endpoint in PHP

I've deployed this to Heroku and you can test it with something like:

```
curl -X POST https://hubtran-webhook-php.herokuapp.com/handler.php?token=sekret -d @invoice_payload.json
```

where `invoice_payload.json` is a invoice payload file one of us gave you.

If you have any questions please email rschmidt@hubtran.com or if I
don't respond, email support@hubtran.com
