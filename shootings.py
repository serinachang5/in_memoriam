from music21 import *

PLAYER_PATH = "/Applications/Utilities/QuickTime Player 7.app"
g = note.Note('G5')
print g.name
g.duration.type = "eighth"
e_flat = note.Note('E-5')
print e_flat

beet5 = stream.Stream()
beet5.repeatAppend(g, 3)
beet5.append(e_flat)

beet5.show("midi", PLAYER_PATH)