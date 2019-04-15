import random
import csv

chars = 'abcdefghijklmnopqrstuvwxyz'
num = '1234567890'
length = 7
pass_list = []
counter = 0
bhawan = 'MM'

while counter < 388:
    password = ''
    for i in range (length - 1):
        password += random.choice(chars)
    password += random.choice(num)

    if password not in pass_list:
        pass_list.append(password)
        counter += 1

fileobj = open(bhawan + '.csv', 'a')
writer = csv.writer(fileobj)
for i in range(counter):
    print(pass_list[i])
    writer.writerow([pass_list[i],bhawan])

