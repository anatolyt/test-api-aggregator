## Test API Aggregator

- Work with docker containers (you can see information about it in .docker folder)
- I follow SOLID ideas
- Use abstract factory to create a new aggregators (coupon & specialty)


## How to use
send POST request to http://127.0.0.1/api/management

Body:

```javascript
[
  {
    "id": 5,
    "rule": "create",
    "service": "CouponService",
    "body": {
      "id": 1,
      "price": 50,
      "description": "Coupon to doctor"
    }
  },
  {
    "id": 6,
    "rule": "update",
    "service": "CouponService",
    "body": {
      "id": 1,
      "price": 70,
      "description": "Coupon to doctor"
    }
  },
  {
    "id": 7,
    "rule": "delete",
    "service": "CouponService",
    "body": {
      "id": 1,
      "price": 70,
      "description": "Coupon to doctor"
    }
  },
  
  {
    "id": 8,
    "rule": "create",
    "service": "SpecialtyService",
    "body": {
      "id": 1,
      "name": "Surgery",
      "specialtyCode": 125
    }
  },
  {
    "id": 9,
    "rule": "update",
    "service": "SpecialtyService",
    "body": {
      "id": 1,
      "name": "Surgery",
      "specialtyCode": 130
    }
  },
  {
    "id": 10,
    "rule": "delete",
    "service": "SpecialtyService",
    "body": {
      "id": 1,
      "name": "Surgery",
      "specialtyCode": 130
    }
  }
]
```
