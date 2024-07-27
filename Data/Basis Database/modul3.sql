-- Buatlah stored procedure dengan database yang telah kalian buat sebelumnya dengan parameter : 
-- IN
-- OUT
-- INOUT

-- 1. Stored Procedure dengan Parameter IN:
-- Procedure ini akan mengambil ID karyawan sebagai input dan mengembalikan nama karyawan.
DELIMITER //

CREATE PROCEDURE GetEmployeeName (IN employeeID INT)
BEGIN
    SELECT nama
    FROM karyawan
    WHERE id_karyawan = employeeID;
END //

DELIMITER ;

-- 2. Stored Procedure dengan Parameter OUT:
-- Procedure ini akan menghitung total jumlah karyawan dan menetapkan nilainya ke parameter OUT.
DELIMITER //

CREATE PROCEDURE GetTotalEmployees (OUT totalEmployees INT)
BEGIN
    SELECT COUNT(*) INTO totalEmployees
    FROM karyawan;
END //

DELIMITER ;

-- 3. Stored Procedure dengan Parameter INOUT:
-- Procedure ini akan mengambil ID karyawan sebagai input dan mengembalikan nama karyawan, dan juga akan menambahkan ID karyawan input sebanyak 1.
DELIMITER //

CREATE PROCEDURE GetNextEmployeeName (INOUT employeeID INT, OUT employeeName VARCHAR(100))
BEGIN
    SELECT nama INTO employeeName
    FROM karyawan
    WHERE id_karyawan = employeeID;
    
    SET employeeID = employeeID + 1;
END //

DELIMITER ;



-- Buatlah Stored Procedure yang bisa memasukkan data baru pada sebuah tabel!
DELIMITER //

CREATE PROCEDURE InsertNewEmployee (
    IN employeeName VARCHAR(100),
    IN jobTitle VARCHAR(100),
    IN hireDate DATE,
    IN salary DECIMAL(10,2),
    IN address VARCHAR(255)
)
BEGIN
    INSERT INTO karyawan (nama, jabatan, tanggal_masuk, gaji, alamat)
    VALUES (employeeName, jobTitle, hireDate, salary, address);
END //

DELIMITER ;
CALL InsertNewEmployee('Nama Karyawan Baru', 'Jabatan Baru', '2024-04-19', 6000.00, 'Alamat Baru');


-- Buatlah Stored Procedure yang bisa memperbaharui data pada sebuah tabel!! 
DELIMITER //

CREATE PROCEDURE UpdateEmployee (
    IN employeeID INT,
    IN newEmployeeName VARCHAR(100),
    IN newJobTitle VARCHAR(100),
    IN newHireDate DATE,
    IN newSalary DECIMAL(10,2),
    IN newAddress VARCHAR(255)
)
BEGIN
    UPDATE karyawan
    SET nama = newEmployeeName,
        jabatan = newJobTitle,
        tanggal_masuk = newHireDate,
        gaji = newSalary,
        alamat = newAddress
    WHERE id_karyawan = employeeID;
END //

DELIMITER ;


Buatlah Stored Procedure yang bisa menghapus data pada sebuah tabel!
DELIMITER //

CREATE PROCEDURE DeleteEmployee (
    IN employeeID INT
)
BEGIN
    DELETE FROM karyawan
    WHERE id_karyawan = employeeID;
END //

DELIMITER ;
CALL DeleteEmployee(1);
