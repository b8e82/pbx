#!/usr/bin/env python
# -*- coding: utf-8 -*-

import sys
import mysql.connector
import os
import subprocess



bashCommand = "sudo /usr/sbin/asterisk -rx 'reload'"
output = subprocess.check_output(['bash','-c', bashCommand])