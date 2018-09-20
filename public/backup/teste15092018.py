#!/usr/bin/env python
# -*- coding: utf-8 -*-

import sys
import mysql.connector
import os
import subprocess

dominio = sys.argv[1]
id = int(sys.argv[2]);
#dominio = 'cliente2.pt'
caminho = '/etc/asterisk/'
caminhoCompleto = caminho + dominio

config = {
  'user': 'root',
  'password': 'q1w2e3r4',
  'host': '127.0.0.1',
  'database': 'oncloud',
  'raise_on_warnings': True,
}


geral = '[general]\n'
geral = geral + 'static = yes\n'
geral = geral + 'writeprotect = no\n'
geral = geral + 'autofallthrough = yes\n'
geral = geral + 'clearglobalsvars = yes\n'
geral = geral + 'priorityjumping = no\n'
geral = geral + 'xtenpatternmatchnew = no\n'

globals = '\n[globals]\n'
globals = globals + 'TOUCH_MONITOR_FORMAT = wav\n'
globals = globals + 'TOUCH_MIXMONITOR_FORMAT = wav\n'
globals = globals + 'DIALOPTIONS = tTKkWwXx\n'
globals = globals + 'PRESS5TOLEVMSG_ENABLE = 0\n'
globals = globals + 'ABSOLUTE_TIMEOUT = 6000\n'
globals = globals + 'RINGTIME = 30\n'
globals = globals + 'RINGTIME_2 = 10\n'
globals = globals + 'TRANSFER_INCOMING_CALLERID = auto\n'

macrodial = '\n[macro-dial]\n'
macrodial = macrodial + 'exten = s,1,GotoIf(${DB_EXISTS(DND/${ARG1})}?${ARG1},9)\n'
macrodial = macrodial + 'exten = s,n,GotoIf(${DB_EXISTS(DevioSempre/${ARG1})}?${ARG6},${DB(DevioSempre/${ARG1})},1)\n'
macrodial = macrodial + 'exten = s,n,Dial(${ARG2},${ARG5},${ARG3})\n'
macrodial = macrodial + 'exten = s,n,GotoIf($["${DIALSTATUS}" = "BUSY"]?s,6)\n'
macrodial = macrodial + 'exten = s,n,GotoIf(${DB_EXISTS(DevioNAtendido/${ARG1})}?${ARG6},${DB(DevioNAtendido/${ARG1})},1:s,9)\n'
macrodial = macrodial + 'exten = s,n,GotoIf(${DB_EXISTS(DevioOcupado/${ARG1})}?${ARG6},${DB(DevioOcupado/${ARG1})},1)\n'
macrodial = macrodial + 'exten = s,n,GotoIf(${ARG4}?all,vm${ARG1},1)\n'
macrodial = macrodial + 'exten = s,n,HangUP()\n'

corpo = ''
contex = ''
all = '\n[all-' + dominio + ']\n'
pjsip = ''
pjsip2 = ''
#id = int('11');

conn = mysql.connector.connect(**config)
cur = conn.cursor()
query = ("SELECT * FROM sippeers where customers_id = %s")
cur.execute(query, (id,))
#cur.execute(query, sys.argv[2])
for row in cur.fetchall():
	contex = contex  + '\n[' + row[6] + ']\n'
	contex = contex  + 'include = all-' + dominio + '\n'
	all = all + 'exten = ' + row[2] + ',1,Macro(dial,${EXTEN},PJSIP/${EXTEN},trwkhTRWKH, ,' + str(row[21]) + ',' + row[6] + ')\n'
	all = all + 'exten = vm' + row[2] + ',1,VoiceMail(' + row[2] + ')\n'
	pjsip = pjsip + '\n[' + row[3] + ']\n'
#	pjsip2 = pjsip + 'transport_name=' + row[5] + '\n'
	pjsip = pjsip + 'transport= transport-udp-nat\n'
	pjsip = pjsip + 'context=' + row[6] + '\n'
	pjsip = pjsip + 'aors=' + row[3] + '\n'
	pjsip = pjsip + 'type=endpoint\n'
#	pjsip2 = pjsip + 'callerid=' + str(row[22]) + '\n'
#	pjsip2 = pjsip + 'dtmf_mode=' + row[8] + '\n'
#	if (row[9] == 1):
#		pjsip2 = pjsip + 'remoteregister=yes\n'
#	else:
#		pjsip2 = pjsip + 'remoteregister=no\n'
#	if (row[10] == 1):
#		pjsip2 = pjsip + 'media_encryption=yes\n'
#	else:
#		pjsip2 = pjsip + 'media_encryption=no\n'
#	if (row[11] == 1):
#		pjsip2 = pjsip + 'enableiprestrict=yes\n'
#	else:
#		pjsip2 = pjsip + 'enableiprestrict=no\n'
#	if (row[12] == 1):
#		pjsip2 = pjsip + 'aggregate_mwi=yes\n'
#	else:
#		pjsip2 = pjsip + 'aggregate_mwi=no\n'
#	pjsip2 = pjsip + 'mailboxes=' + str(row[13]) + '\n'
#	pjsip2 = pjsip + 'mwi_from_user=' + str(row[2]) + '\n'
#	pjsip2 = pjsip + 'language=' + row[14] + '\n'
	pjsip = pjsip + 'allow=' + row[15] + '\n'
#	pjsip2 = pjsip + 'endpttype=' + row[16] + '\n'
	pjsip = pjsip + 'auth = auth' + row[3] + '\n'	
	pjsip = pjsip + '\n[' + row[3] + ']\n'
	pjsip = pjsip + 'type=aor\n'
#	if (row[17] == 1):
#		pjsip = pjsip + 'authenticate_qualify=yes\n'
#	else:
#		pjsip = pjsip + 'authenticate_qualify=no\n'
#	if (row[18] == 1):
#		pjsip = pjsip + 'qualify_frequency=yes\n'
#	else:
#		pjsip = pjsip + 'qualify_frequency=no\n'
	pjsip = pjsip + 'max_contacts=' + str(row[19]) + '\n'
#	pjsip = pjsip + 'contactuser=' + row[2] + '\n'
#	if (row[20] == 1):
#		pjsip = pjsip + 'remove_existing=yes\n'
#	else:
#		pjsip = pjsip + 'remove_existing=no\n'
	pjsip = pjsip + '\n[auth' + row[3] + ']\n'
	pjsip = pjsip + 'type=auth\n'
	pjsip = pjsip + 'auth_type=userpass\n'
	pjsip = pjsip + 'password=' + row[4] + '\n'
	pjsip = pjsip + 'username=' + row[3] + '\n'


textofinalExtension = contex  + all + corpo
textofinalPJSIP = pjsip;
#data=cur.fetchall()
#print(data[0][3])

cur.close()
conn.close()

if not os.path.exists(caminhoCompleto):
	os.mkdir(caminhoCompleto)

arqExtension = open(caminhoCompleto + '/extension.conf', 'w')
textoExtension = []
textoExtension.append(textofinalExtension)
arqExtension.writelines(textoExtension)
arqExtension.close()

arqPJSIP = open(caminhoCompleto + '/pjsip.conf', 'w')
textoPJSIP = []
textoPJSIP.append(textofinalPJSIP)
arqPJSIP.writelines(textoPJSIP)
arqPJSIP.close()


extension = ''
pjsip = '#include pjsip_global.conf\n'

conn = mysql.connector.connect(**config)
cur = conn.cursor()
query = ("SELECT * FROM `customers` ORDER BY `name` ASC")

cur.execute(query)
for row in cur.fetchall():
	if os.path.exists(caminho + row[14]):
		extension = extension  + '\n#include ' + row[14] + '/extension.conf\n'
		pjsip = pjsip  + '#include ' + row[14] + '/pjsip.conf\n'
	
textofinalExtension = geral + globals + extension + macrodial
textofinalPJSIP = pjsip

cur.close()
conn.close()


arqExtension = open(caminho + '/extensions.conf', 'w')
textoExtension = []
textoExtension.append(textofinalExtension)
arqExtension.writelines(textoExtension)
arqExtension.close()

arqPJSIP = open(caminho + '/pjsip.conf', 'w')
textoPJSIP = []
textoPJSIP.append(textofinalPJSIP)
arqPJSIP.writelines(textoPJSIP)
arqPJSIP.close()

bashCommand = "sudo /usr/sbin/asterisk -rx 'reload'"
output = subprocess.check_output(['bash','-c', bashCommand])
print 'teste'
