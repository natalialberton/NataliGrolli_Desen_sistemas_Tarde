from selenium import webdriver
from selenium.webdriver.common.by import By
import time

driver = webdriver.Chrome()
driver.get("file:///C:/Users/natali_grolli/Documents/GitHub/NataliGrolli_Desen_sistemas_Tarde/TESTES/pratica2/produto.html")

codPeca_input = driver.find_element(By.ID, "codPeca")
codPeca_input.send_keys("12345")

descricao_input = driver.find_element(By.ID, "descricao")
descricao_input.send_keys("Uma linda tesoura cortante")

marca_input = driver.find_element(By.ID, "marca")
marca_input.send_keys("Faber Castell")

preco_input = driver.find_element(By.ID, "preco")
preco_input.send_keys("12,50")

qntd_input = driver.find_element(By.ID, "qntd")
qntd_input.send_keys("459")

time.sleep(2000)

submit_button = driver.find_element(By.CSS_SELECTOR, "button[type='submit']")
submit_button.click()