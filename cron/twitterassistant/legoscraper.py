from selenium import webdriver
import time
driver = webdriver.Chrome()
products = driver.find_elements_by_xpath(
    '//*[@id="blt7ab409eccb21b571"]/section/div/div/div[2]/ul/li/div/div[2]/div[1]/a'
)
proLinks = []
for pro in products:
    attr = pro.get_attribute('href')
    proLinks.append(attr)

for l in proLinks:
    driver.get(l)
    time.sleep(3)
