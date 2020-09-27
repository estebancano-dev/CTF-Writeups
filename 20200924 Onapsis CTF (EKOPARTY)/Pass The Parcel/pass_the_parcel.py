import os
import base64
import shlex # to escape shell args

os.system('7z x pass_the_parcel.zip > /dev/null 2>&1;mv flag.txt flag0.txt')
i = 0
while True:
    with open(f'flag{str(i)}.txt', 'rb') as f:
        Lines = f.readlines()

    if len(Lines) != 3:
        os.system(f'rm flag*');
        print('EKO{' + Lines[0].strip().decode() + '}')
        break
    Pass = shlex.quote(Lines[0].strip().decode())  # get rid of the escaping nightmare
    data = Lines[2]

    i += 1
    nuevo = f'flag{str(i)}.zip'
    g = open(nuevo, 'wb')
    g.write(base64.b64decode(data))
    g.close()
    os.system(f'7z x -p{Pass} {nuevo}> /dev/null 2>&1;mv flag.txt flag{str(i)}.txt');
