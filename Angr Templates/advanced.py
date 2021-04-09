#!/usr/bin/env python3
# https://github.com/Ragnar-Security/ctf-tools/blob/master/Reverse%20Engineering/bruteforce_ascii/angr_bruteforce_binary.py
# https://github.com/Ragnar-Security/ctf-writeups/tree/master/google-ctf/Reverse_Engineering/Beginner

import angr
import claripy
import sys
import os.path

def main():
	if not os.path.isfile(sys.argv[1]):
		print(sys.argv[1] + " not found")
		exit()
	flag_format = "tstlss{"

	base_addr = 0x400000 
	base_addr = 0x400000 
	p = angr.Project(sys.argv[1], main_opts = {'auto_load_libs':False, 'base_addr':base_addr}) # set the binary we are working with and the offset
	arg_chars = [claripy.BVS((flag_format + '%d') % i, 8) for i in range(0x30)]  # what to look for (and the length)
	arg = claripy.Concat(*arg_chars + [claripy.BVV(b'\n')])
	
	state = p.factory.entry_state(args = [sys.argv[1]], add_options = angr.options.unicorn, stdin = arg) # What to actually run and ensure that we are working with  STDIN.
	
	#p.hook(0x804ed40, angr.SIM_PROCEDURES['libc']['printf']())
	#p.hook(0x804ed80, angr.SIM_PROCEDURES['libc']['scanf']())
	#p.hook(0x804f350, angr.SIM_PROCEDURES['libc']['puts']())
	#p.hook(0x8048d10, angr.SIM_PROCEDURES['glibc']['__libc_start_main']())
	
	#state = p.factory.blank_state(addr=0x04011C9, add_options={angr.options.LAZY_SOLVES})
	
	# constraints
	for k in arg_chars:
		#state.add_constraints(k != '\x00') # null
		state.add_constraints(k >= ' ') # '\x20'
		state.add_constraints(k <= '~') # '\x7e'

	# flag format constraints
	i=0
	for k in flag_format:
		state.add_constraints(arg_chars[i] == k)
		i+=1

	sm = p.factory.simulation_manager(state)
	sm.run()
	
	#agregado mio
	#sm.explore(find=0x400c33, avoid=0x400b41)
	#sm.explore(find=lambda s: flag_format in s.posix.dumps(1))

	for i in sm.deadended:
		s = i.solver.eval(arg, cast_to=bytes)
		s = s[:s.find(b"}")+1] # Trim off the null bytes at the end of the flag (if any).
		print(s)

if __name__ == "__main__":
	main()