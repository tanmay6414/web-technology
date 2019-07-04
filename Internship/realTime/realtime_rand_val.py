import requests
import random
import time


while True:
    rand_val = random.randrange(20, 50)
    PARAMS = {'val':rand_val}
    URL = "http://localhost/internship/Visual/realval.php"
    r = requests.get(url = URL, params = PARAMS)
    print(rand_val)
    time.sleep(0.001)
