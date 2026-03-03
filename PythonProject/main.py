import tkinter as tk
from grafy import zobraz_graf # předpokládá, že jsi vykreslování v grafy.py dal do funkce zobraz_graf()

root = tk.Tk()
root.title("Admin Panel - Stylové Oblečení")
root.geometry("300x150")

label = tk.Label(root, text="Vítejte v analytice e-shopu")
label.pack(pady=10)

btn = tk.Button(root, text="Zobrazit graf průměrných cen", command=zobraz_graf)
btn.pack(pady=20)

root.mainloop()