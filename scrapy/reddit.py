import requests
from urllib.request import urlopen
from bs4 import BeautifulSoup
from selenium import webdriver
from seleniumrequests import Firefox
import time
from time import sleep
from selenium.webdriver.remote.webelement import WebElement
from selenium.common.exceptions import StaleElementReferenceException
from threading import Thread
import threading
import multiprocessing
from multiprocessing import Pool, Process, Value, Array
import copy
import csv
from tkinter import *
from tkinter import ttk


def init_driver():
	firefox_profile = webdriver.FirefoxProfile()
	# firefox_profile.set_preference('permissions.default.image', 2)
	# firefox_profile.set_preference("permissions.default.stylesheet", 2);
	# firefox_profile.set_preference('dom.ipc.plugins.enabled.libflashplayer.so', 'false')
	return webdriver.Firefox(firefox_profile=firefox_profile) 


def waitForLoad(driver, wait_time):
    elem = driver.find_element_by_tag_name("html")
    count = 0
    while True:
        count += 1
        if count > wait_time:
            return
        time.sleep(1)
        try:
            elem == driver.find_element_by_tag_name("html")
        except StaleElementReferenceException:
            return


print("start reddit")
filename = "result_reddit.csv"
f = open(filename, "w+")
f.close()

driver = init_driver()
url = "https://www.reddit.com/search?q=uiuc"
driver.get(url)

waitForLoad(driver, 2.0)
print("getting blogs")

blogs = driver.find_elements_by_xpath("//a[@class='may-blank thumbnail self']")

contents = driver.find_elements_by_xpath("//div[@class='md']")

blogs_list = []
for i in blogs:
	temp = i.get_attribute("href") 
	temp = temp.replace("/?ref=search_posts", "").replace("_", " ")
	blogs_list.append(temp[46:])

contents_list = []
for i in contents:
	temp = i.find_element_by_css_selector("p").text
	contents_list.append(temp)

print(len(blogs_list))
print(len(contents_list))

next = driver.find_elements_by_xpath("//a[@rel='nofollow next']")
next[1].click()

#next loop
counter = 20
while(counter > 0):
	waitForLoad(driver, 2.0)
	print("next loop...")
	blogs = driver.find_elements_by_xpath("//a[@class='search-title may-blank']")
	contents = driver.find_elements_by_xpath("//div[@class='md']")

	for i in blogs:
		temp = i.get_attribute("href") 
		temp = temp.replace("/?ref=search_posts", "").replace("_", " ")
		blogs_list.append(temp[46:])

	for i in contents:
		temp = i.find_element_by_css_selector("p").text
		contents_list.append(temp)

	print(len(blogs_list))
	print(len(contents_list))
	try:
		next = driver.find_elements_by_xpath("//a[@rel='nofollow next']")
	except:
		break

	try:
		next[0].click()
	except:
		break	
	counter += -1

spamwriter = csv.writer(open(filename, 'a'), delimiter='^', quoting=csv.QUOTE_MINIMAL)
for i in range(min(len(blogs_list), len(contents_list))):
	spamwriter.writerow([str(blogs_list[i]), str(contents_list[i])])

driver.quit()


