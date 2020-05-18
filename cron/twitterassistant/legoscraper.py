from selenium import webdriver
import mysql.connector
import time
import urllib.request
import random
""" MYSQL DRIVER """
db = mysql.connector.connect(host="localhost",
                             user="root",
                             passwd="root",
                             database="lego_scraper")

driver = webdriver.Chrome()


def rand_number():
    return str(random.randint(1000, 99999)) + str(int(time.time())) + str(
        random.randint(1000, 99999)) + str(int(time.time()))


def insert(db, itemNum, imageNam):
    """ 
    INSERT INTO DB
     """
    sql = "INSERT INTO twas_posts (title, slug) VALUES (%s, %s)"
    val = (itemNum, imageNam)
    cursor = db.cursor()
    cursor.execute(sql, val)
    db.commit()


""" GET MAIN URL """
driver.get('https://www.lego.com/en-us/categories/retiring-soon')
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
    itemNum = driver.find_element_by_xpath(
        '//*[@id="main-content"]/div/div[3]/div/div[4]/span[2]').text
    img = driver.find_element_by_xpath(
        '//*[@id="main-content"]/div/div[2]/div/div/div[1]/div/div/div/div[1]/div/div[1]/ul/li[1]/div/div/div/div[1]/div/picture/img'
    ).get_attribute("src")
    insert(db, itemNum, img)
    time.sleep(3)
