import music21
import csv
import random

PLAYER_PATH = "/Applications/Utilities/QuickTime Player 7.app"
NOTE_LENGTH = "16th"
REST = music21.note.Rest()
REST.duration.quarterLength = 0.75
FIRST_MONTH = 1
FIRST_YEAR = 0

KEYS = ["A","B","C","D","E","F","G"]
ACCIDENTALS = ["-","","#"]

def random_pitch():
    pitch = random.choice(KEYS)
    pitch += random.choice(ACCIDENTALS)
    pitch += str(random.choice(range(3,7)))
    return pitch

def build_part(date, num):
    part = music21.stream.Part()

    date = date.split("/")
    month = int(date[0])
    year = int(date[2])
    month_offset = (year-FIRST_YEAR)*12 + month-FIRST_MONTH
    part.repeatAppend(REST, month_offset)

    note = music21.note.Note(random_pitch())
    note.duration.type = NOTE_LENGTH
    part.repeatAppend(note, num)

    return [part, note]

def main_stream():
    sc = music21.stream.Score()
    with open("shootings.csv", "rb") as data:
        csvreader = csv.DictReader(data)
        for row in csvreader:
            date = row["Date"]
            vic_num = int(row["Total victims"].split()[0])
            part = build_part(date, vic_num)
            print row["Case"], part[1]
            sc.insert(part[0])
    return sc

sc = main_stream()
sc.show("text")
sc.show("midi",PLAYER_PATH)
