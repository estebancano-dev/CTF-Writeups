import angr
import sys

project = angr.Project(sys.argv[1], auto_load_libs=False)

@project.hook(project.entry)
def print_flag(state):
    print("FLAG SHOULD BE:", state.posix.dumps(0))
    #project.terminate_execution()

project.execute()