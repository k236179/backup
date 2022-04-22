SELECT * FROM order_info, order_item WHERE order_info.id = order_item.order_info;

SELECT order_item.*,order_info.*
FROM order_item,product,order_info
WHERE order_item.product = product.id
AND order_info.id = order_item.order_info;


SELECT order_item.*, product.name, product.price FROM order_item, order_info, product WHERE order_item.order_info=order_info.id AND order_item.product = product.id AND product = 3;


<!-- what i want -->

SELECT order_item.counter,order_item.memo , lessons.name, lessons.price, product.name, product.price, order_info.address, order_info.create_time, order_info.receipent,order_info.coupon, user.name, coupon.discount FROM order_item, lessons, product, order_info, user, coupon WHERE order_item.product = product.id AND order_item.class = lessons.id AND order_item.order_info = order_info.id AND order_info.user = user.id AND order_info.coupon = coupon.id;