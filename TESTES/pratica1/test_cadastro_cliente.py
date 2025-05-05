from selenium import webdriver
from selenium.webdriver.common.by import By
import time

#Configurando do WebDriver (nesse exemplo, estamos usando o Chrome)
driver = webdriver.Chrome()

#Acesso a página de cadastro usando o caminho absoluto com o protocolo file://
#Certifique-se de que o caminho está apontando para um arquivo HTML específico
driver.get("file:///C:\Users\natali_grolli\Documents\GitHub\NataliGrolli_Desen_sistemas_Tarde\TESTES\pratica1\index.html")

#Preenche o campo Nome
nome_input = driver.find_element(By.ID, "name")
nome_input.send_keys("João da Silva")

#Preenche o campo CPF
cpf_input = driver.find_element(By.ID, "cpf")
cpf_input.send_keys("12345678910")

#Preenche o campo Endereço
endereco_input = driver.find_element(By.ID, "address")
endereco_input.send_keys("Rua das Flores, 123")

#Preenche o campo Telefone
telefone_input = driver.find_element(By.ID, "phone")
telefone_input.send_keys("11987654321")

#Clica no botão Cadastrar
submit_button = driver.find_element(By.CSS_SELECTOR, "button[type='submit']")
submit_button.click()

#Aguarda um momento para visualizar o resultado (em uma aplicação real, você verificaria a resposta)
time.sleep(3)

#Fecha o navegador
driver.quit()