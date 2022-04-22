SELECT * FROM order_info, order_item WHERE order_info.id = order_item.order_info;

SELECT order_item.*,order_info.*
FROM order_item,product,order_info
WHERE order_item.product = product.id
AND order_info.id = order_item.order_info;