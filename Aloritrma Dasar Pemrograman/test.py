def tambah():
    try:
        angka1 = float(input("Masukkan angka pertama: "))
        angka2 = float(input("Masukkan angka kedua: "))
        hasil = angka1 + angka2
        print("Hasil penjumlahan:", hasil)
    except ValueError:
        print("Masukkan angka yang valid!")

if __name__ == "__main__":
    tambah()
