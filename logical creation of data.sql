-- Drop procedure if it exists
DROP PROCEDURE IF EXISTS generate_random_data;

DELIMITER //

-- Create a procedure to insert 200 random rows
CREATE PROCEDURE generate_random_data()
BEGIN
    DECLARE i INT DEFAULT 0;
    DECLARE serial VARCHAR(12);
    DECLARE imei VARCHAR(14);
    DECLARE cost_method ENUM('By Value', 'By Quantity');
    DECLARE status ENUM('Issued', 'Reserved', 'In Stock', 'Pending');
    
    -- Loop to insert 200 records
    WHILE i < 200 DO
        -- Generate random serial number and IMEI
        SET serial = LPAD(FLOOR(RAND() * 1000000000000), 12, '0');
        SET imei = LPAD(FLOOR(RAND() * 100000000000000), 14, '0');
        
        -- Randomly assign cost method
        SET cost_method = IF(FLOOR(RAND() * 2) = 0, 'By Value', 'By Quantity');
        
        -- Randomly assign status
        SET status = CASE FLOOR(RAND() * 4)
            WHEN 0 THEN 'Issued'
            WHEN 1 THEN 'Reserved'
            WHEN 2 THEN 'In Stock'
            ELSE 'Pending'
        END;
        
        -- Insert record into product_service_stock_items table
        INSERT INTO product_service_stock_items (
            pssi_serial,
            pssi_imei,
            pssi_cost_method,
            currency_id,
            pssi_order_value,
            pssi_increment_cost,
            pssi_cost,
            pssi_cost_original,
            pssi_leased,
            pssi_status,
            purchase_id
        ) VALUES (
            serial,
            imei,
            cost_method,
            1,
            0.00,
            0.00,
            0.00,
            0.00,
            'No',
            status,
            0
        );
        
        -- Increment counter
        SET i = i + 1;
    END WHILE;
END //

DELIMITER ;

-- Call the procedure to generate data
CALL generate_random_data();

-- Drop the procedure after execution
DROP PROCEDURE generate_random_data;
